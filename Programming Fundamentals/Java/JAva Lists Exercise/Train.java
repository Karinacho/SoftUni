package p1;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;
import java.util.stream.Collectors;

public class Train {
    public static void main(String[] args) {
        Scanner reader = new Scanner(new InputStreamReader(System.in));
        List<Integer> train =Arrays.stream(reader.nextLine().split("\\s+"))
                .map(Integer::parseInt)
                .collect(Collectors.toCollection(ArrayList::new));

        int maxCapacity = Integer.parseInt(reader.nextLine());

        List<String> tokens = Arrays.stream(reader.nextLine().split("\\s+")).collect(Collectors.toList());
        while (!(tokens.get(0).equals("end")))
        {
            if (tokens.size() > 1)
            {
                if (Integer.parseInt(tokens.get(1)) <= maxCapacity)
                {
                    train.add(Integer.parseInt(tokens.get(1)));
                }
            }
            else
            {
                for (int i = 0; i < train.size(); i++)
                {
                    int passengers = Integer.parseInt(tokens.get(0));

                    if (passengers <= maxCapacity && train.get(i) + passengers <= maxCapacity)
                    {
                       int res=train.get(i)+passengers;
                        train.set(i,res);
                        break;
                    }
                }
            }

            tokens = Arrays.stream(reader.nextLine().split("\\s+")).collect(Collectors.toList());
        }

        System.out.println(train.toString().replaceAll("[\\[\\],]",""));
    }

    }

