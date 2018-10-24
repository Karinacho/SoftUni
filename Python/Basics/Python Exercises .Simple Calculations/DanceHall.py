import math
lengthInCm = float(input())*100
widthInCm = float(input())*100
wardrobeLength = float(input())*100

hallArea = lengthInCm * widthInCm
wardrobeArea = wardrobeLength * wardrobeLength
benchArea = hallArea/10
freeSpace = hallArea - wardrobeArea - benchArea
dancers = math.floor(freeSpace/(40+7000))
print(dancers)



