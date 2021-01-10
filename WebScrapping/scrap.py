import requests
import bs4
import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="student"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT * FROM rating")

myresult = mycursor.fetchall()
i = 0
for x in myresult:
    try:
    
        res = requests.get('https://www.codechef.com/users/' + x[8])
        soup = bs4.BeautifulSoup(res.text, 'html.parser')
        score1 = soup.select('.rating-number')[0].getText()
        sql = "UPDATE rating SET ccs=" + score1 + " WHERE id=" + str(x[0]) + "";
        mycursor.execute(sql)
        mydb.commit()

        res = requests.get('https://codeforces.com/profile/' + x[7])
        soup = bs4.BeautifulSoup(res.text, 'html.parser')
        score2 = soup.select('div.info>ul span')[0].getText()
        sql = "UPDATE rating SET cfs=" + score2 + " WHERE id=" + str(x[0]) + "";
        mycursor.execute(sql)
        mydb.commit()

        tt = int(score1) + int(score2)
        sql = "UPDATE rating SET totalScore=" + str(tt) + " WHERE id=" + str(x[0]) + "";
        mycursor.execute(sql)
        mydb.commit()
        print(i)
        i += 1
    except:
        pass
