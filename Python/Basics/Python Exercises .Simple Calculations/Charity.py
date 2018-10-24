dni = int(input())
gotvachi = int(input())
torti = int(input())
gofreti = int(input())
palachinki = int(input())

pariZaTorti = torti * 45
pariZaGofreti = gofreti * 5.80
pariZaPalachinki = palachinki * 3.20

sumaZaDen = (pariZaTorti + pariZaGofreti + pariZaPalachinki) * gotvachi
obshtaSuma = sumaZaDen * dni
ostatuk = obshtaSuma - (obshtaSuma * 0.125)
print(f"{ostatuk:.2f}")


