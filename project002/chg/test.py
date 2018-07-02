

data = ""

with open('tet.txt', 'r') as f:
    data = f.read()


data = data.replace('&', '&amp;')
data = data.replace('<', '&lt;')
data = data.replace('>', '&gt;')

with open('tet.txt', 'w') as f:
    f.write(data)
