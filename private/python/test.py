x = "awesome"
def myfunc():
    global x
    x = "new awesome"
    print(x)
print(x)

myfunc()
