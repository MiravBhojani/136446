from flask import Flask, render_template, request
import pandas as pd
import pickle
import io

app = Flask(__name__)

# Load the trained model from the pickle file
with open('C:/xampp/htdocs/cai/Cricket_predict_batting/batting.pkl', 'rb') as model_file:
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
    features_rf = ['Matches', 'Runs', 'Bowls', 'Outs', 'Performance Runs 5', 'Performance Runs 4', 'Performance Runs 3', 'Performance Runs 2', 'Performance Runs 1']

    # Use the data for prediction
    X_input = df[features_rf]
    predictions_run_6 = model.predict(X_input)

    # Add the predicted values to the DataFrame
    df['Performance Runs 6'] = predictions_run_6

    # Calculate the average performance
    average_performance = df['Performance Runs 6'].mean()

    # Compare predicted Performance Runs 6 with Average
    df['Performance Runs 6 vs Average'] = df['Performance Runs 6'] - average_performance

    # Select the top 6 players based on the comparison
    top_players_comparison = df.nlargest(6, 'Performance Runs 6 vs Average')[['Name', 'Performance Runs 6 vs Average', 'Performance Runs 6']]

    return render_template('index.html', best_players=top_players_comparison.to_dict('records'))

if __name__ == '__main__':
    app.run(debug=True)