import numpy as np
import scipy.stats
import scipy.spatial
import pandas as pd
import csv
import sys

users = sys.argv[1]
print(users)
item = 30
users = int(users)
def readingFile(filename):
	f = open(filename,"r")
	data = []
	count = 0
	for row in f:
		if count>0:
			r = row.split(',')
			e = [int(r[0]), int(r[1]), int(r[2])]

			data.append(e)
			count = count + 1
		else:
			count = count + 1
	return data

'''def readingFile1(filename):
	f = open(filename,"r")
	data = []
	count = 0
	for row in f:
		r = row.split(',')
		e = [int(r[0]), int(r[1]), float(r[2])]
		data.append(e)
	return data'''
	
def similarity_user(data):
	user_similarity_cosine = np.zeros((users,users))
	user1 = 0
	final_data = []
	for user2 in range(users):
		if np.count_nonzero(data[users]) and np.count_nonzero(data[user2]):
			user_similarity_cosine[user1][user2] = 1-scipy.spatial.distance.cosine(data[users],data[user2])
			final_data.append([str(users),str(user2+1),str(user_similarity_cosine[user1][user2])])
			
			"""f_i_d.write(str(user1) + "," + str(user2) + "," + str(user_similarity_cosine[user1][user2]) + "," + str(user_similarity_jaccard[user1][user2]) + "," + str(user_similarity_pearson[user1][user2]) + "\n")
										f_i_d.close()"""
	with open("similar_user.csv",'w') as file:
		csv_file = csv.writer(file,delimiter=',')
		csv_file.writerow(['User_1','User_2','Similarity'])
	with open("similar_user.csv",'a') as file:
		csv_file = csv.writer(file,delimiter=',')
		csv_file.writerows(final_data)
	return user_similarity_cosine

data = readingFile("data.csv")
x = similarity_user(data)


data1 = pd.read_csv('similar_user.csv')
data1 = data1[data1['User_1']==users]
sort_by_similarity = data1.sort_values('Similarity',ascending=False).head(5)
top_k_sim_user = list(sort_by_similarity['User_2'])
data2 = pd.read_csv('niki_labels.csv')
#total_user = list(data1['user'])
rec_sub =[]
for x in top_k_sim_user:
	y = list(data2[data2['User_id']==x]['Course'].values)
	rec_sub=rec_sub + y
result = max(rec_sub)
print(list(set(rec_sub)))