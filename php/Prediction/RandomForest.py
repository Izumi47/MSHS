import pickle
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score, precision_score
from sklearn.ensemble import RandomForestClassifier

# Load and preprocess data
data = pd.read_csv('../Data/training data.csv')

# Preprocessing steps
data['CGPA'] = data['CGPA'].map({'Below 2.00': 0, '2.00 to 2.50': 1, '2.51 to 3.00': 2, '3.01 to 3.50': 3, '3.50 to 3.99': 4, '4': 5})
data['Class Performance [Bahasa Melayu]'] = data['Class Performance [Bahasa Melayu]'].map({'Bad': 1, 'Poor': 2, 'Average': 3, 'Good': 4, 'Excellent': 5})
data['Class Performance [English]'] = data['Class Performance [English]'].map({'Bad': 1, 'Poor': 2, 'Average': 3, 'Good': 4, 'Excellent': 5})
data['Class Performance [Sejarah]'] = data['Class Performance [Sejarah]'].map({'Bad': 1, 'Poor': 2, 'Average': 3, 'Good': 4, 'Excellent': 5})
data['Class Performance [Mathematics]'] = data['Class Performance [Mathematics]'].map({'Bad': 1, 'Poor': 2, 'Average': 3, 'Good': 4, 'Excellent': 5})
data['Class Performance [Science]'] = data['Class Performance [Science]'].map({'Bad': 1, 'Poor': 2, 'Average': 3, 'Good': 4, 'Excellent': 5})

interests_list = ['Mathematics', 'Science (Physics, Chemistry, Biology)', 'Literature and Language Arts', 'History and Social Studies', 'Technology and Computer Science', 'Art and Creative Expression', 'Physical Education and Sports', 'Music and Performing Arts', 'Environmental Studies', 'Career and Vocational Interests']

for interest in interests_list:
    data['Interest_' + interest] = data['Interests'].apply(lambda x: 1 if interest in x else 0)
data.drop('Interests', axis=1, inplace=True)

data['Ambition'] = data['Ambition'].map({'Doctor or Healthcare Professional': 0, 'Engineer (e.g., Mechanical, Civil, Electrical)': 1, 'Computer Scientist or Software Developer': 2, 'Teacher or Educator': 3, 'Artist or Creative Professional': 4, 'Entrepreneur or Business Owner': 5, 'Musician or Performer': 6, 'Lawyer or Legal Professional': 7, 'Athlete or Sports Coach': 8, 'Scientist or Researcher': 8})

data['Current Class Stream'] = data['Current Class Stream'].map({'Science Stream': 0, 'Arts Stream': 1, 'Commerce Stream': 2, 'Islamic Studies Stream': 3, 'Arts and Music Stream': 4, 'Sports Stream': 5, 'Science stream but taking accounts instead of biology': 6})

# Handle NaN values by dropping rows with NaN values
data.dropna(inplace=True)

# Split data into features and target
X = data.drop('Current Class Stream', axis=1)
y = data['Current Class Stream']

# Train the classifier
classifier = RandomForestClassifier(n_estimators=100, random_state=0)
classifier.fit(X, y)

# Splitting the dataset into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Training the Random Forest Classifier
rf_classifier = RandomForestClassifier(n_estimators=100, random_state=42)
rf_classifier.fit(X_train, y_train)

# Predicting on the test set and calculating accuracy and precision
y_pred = rf_classifier.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)
precision = precision_score(y_test, y_pred, average='weighted')

# Save accuracy and precision along with the model
model_info = {
    'model': rf_classifier,
    'accuracy': accuracy,
    'precision': precision
}

# Exporting the model info
with open('rfml_model_info.pkl', 'wb') as model_info_file:
    pickle.dump(model_info, model_info_file)

# Outputting the model performance
print("Class Stream Mapping:")
print("= Science Stream: 0")
print("= Arts Stream: 1")
print("= Commerce Stream: 2")
print("= Islamic Studies Stream: 3")
print("= Arts and Music Stream: 4")
print("= Sports Stream: 5")
print("Model Accuracy:", accuracy)
print("Model Precision:", precision)