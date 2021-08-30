# User inputs the string and it gets stored in variable str
from datetime import time
import sys
import re
import pandas as pd
from sklearn.model_selection import train_test_split
import xgboost as xgb
from sklearn.preprocessing import LabelEncoder

input = sys.argv[1]
rows = re.split('{', input) # 1~len(rows)-1
for i in range(1, len(rows)):
    rows[i] = re.split(': |,', rows[i])
# userid: int(rows[n][0][7:])
# movieid: int(rows[n][1][8:])
# rating: int(rows[n][2][7:])
# timestamp: int(rows[n][3][10:])

userid = []
movieid = []
rating = []
timestamp = []
for i in range(1, len(rows)-1):
    userid.append((int(rows[i][0][7:])))
    movieid.append((int(rows[i][1][8:])))
    rating.append((float(rows[i][2][7:])))
    timestamp.append(int(rows[i][3][10:len(rows[i][3])-1]))

myframe = pd.DataFrame()
myframe['userid'] = userid
myframe['movieid'] = movieid
myframe['timestamp'] = timestamp
#print(myframe.head(68))

file_name = 'ratings_small_2.csv'
data = pd.read_csv(file_name, encoding='utf-8', engine='python')
data['rating'] = data['rating'] / data['rating'].max()
target = data['rating']
del data['rating']
del data['index']
x_train, x_test, y_train, y_test = train_test_split(data, target, train_size=0.8, random_state=5)

clf = xgb.XGBClassifier()
booster = xgb.Booster()
booster.load_model('xgb.model')
clf._Booster = booster
clf._le = LabelEncoder().fit(y_test)
y_pred = clf.predict(myframe)

max_2 = []
max_2.append(list(y_pred).index(max(y_pred)))
y_pred[max_2[0]] = 0
max_2.append(list(y_pred).index(max(y_pred)))
print("max: ", myframe['movieid'][max_2[0]], myframe['movieid'][max_2[1]])