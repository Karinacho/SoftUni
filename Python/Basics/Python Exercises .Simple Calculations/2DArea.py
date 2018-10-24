
x1 = float(input())
y1 = float(input())
x2 = float(input())
y2 = float(input())

width = abs(x1-x2)
length = abs(y1-y2)

area = width * length
perimeter = (2 * length) + (2* width)

print(area)
print(perimeter)