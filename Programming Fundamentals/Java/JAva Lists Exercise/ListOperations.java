import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;
import java.util.stream.Collectors;

public class ListOperations {
    public static void main(String[] args) {
        Scanner sc=new Scanner(System.in);
        List<Integer> list = Arrays.stream(sc.nextLine().split("\\s+"))
                .map(Integer::parseInt)
                .collect(Collectors.toCollection(ArrayList::new));

        List<String> tokens = Arrays.stream(sc.nextLine().split("\\s+")).collect(Collectors.toList());

        while (!(tokens.get(0).equals("End")))
        {
            switch (tokens.get(0))
            {
                case "Add":
                    list.add(Integer.parseInt(tokens.get(1)));
                    break;
                case "Insert":
                   int index = Integer.parseInt(tokens.get(2));
                    int number = Integer.parseInt(tokens.get(1));

                    if (index <= list.size() - 1)
                    {
                        list.add(index, number);
                    }
                    else
                    {
                        System.out.println("Invalid Index");

                    }
                    break;
                case "Remove":
                    index = Integer.parseInt(tokens.get(1));

                    if (index <= list.size() - 1)
                    {
                        list.remove(index);
                    }
                    else
                    {
                        System.out.println("Invalid Index");
                    }
                    break;
                case "Shift":
                    if (tokens.get(1) .equals("left"))
                    {
                        int count = Integer.parseInt(tokens.get(2));

                        for (int i = 0; i < count; i++)
                        {
                            list.add(list.size(), list.get(0));
                            list.remove(0);
                        }
                    }
                    else if (tokens.get(1).equals("right"))
                    {
                        int count = Integer.parseInt(tokens.get(2));

                        for (int i = 0; i < count; i++)
                        {
                            list.add(0, list.get(list.size() - 1));
                            list.remove(list.size() - 1);
                        }
                    }
                    break;
            }

            tokens = Arrays.stream(sc.nextLine().split("\\s+")).collect(Collectors.toList());
        }
        System.out.println(list.toString().replaceAll("[\\[\\]*,]",""));

    }
}
