from flask import Flask, render_template, request
import pandas as pd
import pickle
import io

app = Flask(__name__)

# Load the trained model from the pickle file
with open('C:/xampp/htdocs/cai/cricket_predict_bowling/Bowling.pkl', 'rb') as model_file:
    model = pickle.load(model_file)

@app.route('/', methods=['GET'])
def home():
    return render_template('index.html')

@app.route('/predict', methods=['POST'])
def predict():
    # Check if a file was uploaded
    if 'csv_file' not in request.files:
        return 'No file uploaded.', 400

    file = request.files['csv_file']

    # Check if the file has a valid name
    if file.filename == '':
        return 'No selected file.', 400

    # Check if the file has a valid extension
    if not file.filename.endswith('.csv'):
        return 'Invalid file type. Please upload a CSV file.', 400

    try:
        # Parse the CSV file
        df = pd.read_csv(io.StringIO(file.read().decode('utf-8')))
    except Exception as e:
        return f'Error reading CSV file: {e}', 400

    # Define the column names for prediction
    features_bw = ['Matches', 'Overs Bowled', 'Bowls', 'Runs Given', 'Wickets Taken','Economy',
                   'Performance Wickets 5', 'Performance Wickets 4', 'Performance Wickets 3',
                   'Performance Wickets 2', 'Performance Wickets 1']

    # Use the data for prediction
    X_input_bw = df[features_bw]
    predictions_average_bw = model.predict(X_input_bw)

    # Add the predicted values to the DataFrame
    df['Performance Wickets 6'] = predictions_average_bw

    # Calculate the average performance
    average_performance_bw = df['Performance Wickets 6'].mean()

    # Compare predicted Performance Wickets 6 with Average
    df['Performance Wickets 6 vs Average'] = df['Performance Wickets 6'] - average_performance_bw

    # Select the top 5 players based on the comparison
    top_players_comparison_bw = df.nlargest(5, 'Performance Wickets 6 vs Average')[['Name', 'Performance Wickets 6 vs Average', 'Performance Wickets 6']]

    return render_template('index.html', best_players=top_players_comparison_bw.to_dict('records'))

if __name__ == '__main__':
    app.run(debug=True)