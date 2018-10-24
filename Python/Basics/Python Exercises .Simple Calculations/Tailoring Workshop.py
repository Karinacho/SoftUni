count = int(input())
length = float(input())
width = float(input())

area1 = count * (length + 2 * 0.30) * (width + 2 * 0.30)
area2 = count * (length/2)*(length/2)

moneyInDollars = area1 * 7 + area2*9
moneyInLeva = moneyInDollars * 1.85

print("%.2f USD" % moneyInDollars)
print("%.2f BGN" % moneyInLeva)