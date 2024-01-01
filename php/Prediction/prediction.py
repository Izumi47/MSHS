import sys
import pandas as pd
import pickle

def load_model(model_path):
    with open(model_path, 'rb') as file:
        model_info = pickle.load(file)
    return model_info

def preprocess_input_data(input_data):
    # Map input data to the format used in training
    input_data['CGPA'] = map_cgpa(input_data['CGPA'])
    input_data['Class Performance [Bahasa Melayu]'] = map_performance(input_data['Class Performance [Bahasa Melayu]'])
    input_data['Class Performance [English]'] = map_performance(input_data['Class Performance [English]'])
    input_data['Class Performance [Sejarah]'] = map_performance(input_data['Class Performance [Sejarah]'])
    input_data['Class Performance [Mathematics]'] = map_performance(input_data['Class Performance [Mathematics]'])
    input_data['Class Performance [Science]'] = map_performance(input_data['Class Performance [Science]'])
    input_data['Ambition'] = map_ambition(input_data['Ambition'])

    # Binary encode 'Interests'
    interests_list = ['Mathematics', 'Science (Physics, Chemistry, Biology)', 'Literature and Language Arts', 'History and Social Studies', 'Technology and Computer Science', 'Art and Creative Expression', 'Physical Education and Sports', 'Music and Performing Arts', 'Environmental Studies', 'Career and Vocational Interests']
    for interest in interests_list:
        input_data['Interest_' + interest] = 1 if interest in input_data['Interests'] else 0
    input_data.pop('Interests', None)

    return pd.DataFrame([input_data])

def map_cgpa(cgpa):
    mapping = {'Below 2.00': 0, '2.00 to 2.50': 1, '2.51 to 3.00': 2, '3.01 to 3.50': 3, '3.50 to 3.99': 4, '4': 5}
    return mapping.get(cgpa, -1)

def map_performance(performance):
    mapping = {'Bad': 1, 'Poor': 2, 'Average': 3, 'Good': 4, 'Excellent': 5}
    return mapping.get(performance, -1)

def map_ambition(ambition):
    mapping = {'Doctor or Healthcare Professional': 0, 'Engineer (e.g., Mechanical, Civil, Electrical)': 1, 'Computer Scientist or Software Developer': 2, 'Teacher or Educator': 3, 'Artist or Creative Professional': 4, 'Entrepreneur or Business Owner': 5, 'Musician or Performer': 6, 'Lawyer or Legal Professional': 7, 'Athlete or Sports Coach': 8, 'Scientist or Researcher': 8}
    return mapping.get(ambition, -1)

if __name__ == "__main__":
    model_info_path = 'rfml_model_info.pkl'
    model_info = load_model(model_info_path)

    model = model_info['model']

    # Mapping for stream labels
    stream_mapping = {0: 'Science Stream', 1: 'Arts Stream', 2: 'Commerce Stream', 3: 'Islamic Studies Stream', 4: 'Arts and Music Stream', 5: 'Sports Stream', 6: 'Science stream but taking accounts instead of biology'}

    # Input data from command line arguments or other sources
    input_data = {
        'CGPA': sys.argv[1],
        'Class Performance [Bahasa Melayu]': sys.argv[2],
        'Class Performance [English]': sys.argv[3],
        'Class Performance [Sejarah]': sys.argv[4],
        'Class Performance [Mathematics]': sys.argv[5],
        'Class Performance [Science]': sys.argv[6],
        'Physical Performance': sys.argv[7],
        'Interests': sys.argv[8],
        'Ambition': sys.argv[9]
    }

    # Preprocess input data
    preprocessed_input_data = preprocess_input_data(input_data)

    # Predicting the class
    predicted_stream_numeric = model.predict(preprocessed_input_data)[0]
    predicted_stream_label = stream_mapping[predicted_stream_numeric]

    # Output the predicted class stream
    print(f"Suitable Class Stream: <b>{predicted_stream_label}</b>")

    # Output accuracy and precision
    print("<br><br>Model Accuracy:", model_info['accuracy'])
    print("<br>Model Precision:", model_info['precision'])
