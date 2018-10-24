wiskieBGN = float(input())
beerL = float(input())
wineL = float(input())
rakiaL = float(input())
wiskieL = float(input())

forWiskie = wiskieBGN*wiskieL
priceforRakia = wiskieBGN/2
forRakia = priceforRakia * rakiaL
priceforWine = priceforRakia - (priceforRakia * 0.4)
forWine = priceforWine * wineL
priceforBeer = priceforRakia -(priceforRakia * 0.8)
forBeer = priceforBeer * beerL
sum = forBeer + forRakia + forWine + forWiskie
print(f"{sum:.2f}")