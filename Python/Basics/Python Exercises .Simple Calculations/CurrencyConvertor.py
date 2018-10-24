money = float(input())
inputCurrency = input()
outputCurrency = input()

if inputCurrency == "BGN":
    if outputCurrency == "USD":
        outputMoney = money / 1.79549
        print(f"{outputMoney:.2f}")
    elif outputCurrency == "EUR":
        outputMoney = money / 1.95583
        print(f"{outputMoney:.2f}")
    elif outputCurrency == "GBP":
        outputMoney = money / 2.53405
        print(f"{outputMoney:.2f}")
elif inputCurrency == "USD":
    if outputCurrency == "BGN":
        outputMoney = money *1.79549
        print(f"{outputMoney:.2f}")
    elif outputCurrency == "EUR":
        currencyInLeva = money*1.79549
        outputMoney = currencyInLeva/1.95583
        print(f"{outputMoney:.2f}")
    elif outputCurrency == "GBP":
        currencyInLeva = money*1.79549
        outputMoney = currencyInLeva/2.53405
        print(f"{outputMoney:.2f}")
elif inputCurrency == "EUR":
    if outputCurrency == "BGN":
        currencyInLeva= money*1.95583
        print(f"{currencyInLeva:.2f}")
    elif outputCurrency == "USD":
        currencyInLeva = money * 1.95583
        outputMoney = currencyInLeva / 1.79549
        print(f"{outputMoney:.2f}")
    elif outputCurrency == "GBP":
        currencyInLeva = money * 1.95583
        outputMoney = currencyInLeva / 2.53405
        print(f"{outputMoney:.2f}")
elif inputCurrency == "GBP":
    if outputCurrency == "BGN":
        currencyInLeva = money*2.53405
        print(f"{currencyInLeva:.2f}")
    elif outputCurrency == "EUR":
        currencyInLeva = money*2.53405
        outputMoney = currencyInLeva / 1.95583
        print(f"{outputMoney:.2f}")
    elif outputCurrency == "USD":
        currencyInLeva = money * 2.53405
        outputMoney = currencyInLeva / 1.79549
        print(f"{outputMoney:.2f}")