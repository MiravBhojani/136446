import pandas as pd
import numpy as np

# Create 5 CSV files with test data
for j in range(1, 6):
    # Create a DataFrame with test data for 50 players
    df = pd.DataFrame({
        'Name': [f'Player {i}' for i in range(1, 51)],
        'Matches': np.random.randint(1, 100, 50),
        'Runs': np.random.randint(1, 5000, 50),
        'Bowls': np.random.randint(1, 5000, 50),
        'Outs': np.random.randint(1, 100, 50),
        'Performance Runs 5': np.random.randint(1, 500, 50),
        'Performance Runs 4': np.random.randint(1, 500, 50),
        'Performance Runs 3': np.random.randint(1, 500, 50),
        'Performance Runs 2': np.random.randint(1, 500, 50),
        'Performance Runs 1': np.random.randint(1, 500, 50),
    })

    # Save the DataFrame as a CSV file
    df.to_csv(f'test_data_{j}.csv', index=False)