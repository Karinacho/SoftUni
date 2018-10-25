import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;
import java.util.stream.Collectors;

public class ChangeList {
    public static void main(String[] args) {
        Scanner reader=new Scanner(System.in);
        List<Integer> list = Arrays.stream(reader.nextLine().split("\\s+"))
                .map(Integer::parseInt)
                .collect(Collectors.toCollection(ArrayList::new));
        List<String> tokens = Arrays.stream(reader.nextLine().split("\\s+")).collect(Collectors.toList());

        while (!(tokens.get(0).equals("end")))
        {
            switch (tokens.get(0))
            {
                case "Insert":
                    int element = Integer.parseInt(tokens.get(1));
                    int position = Integer.parseInt(tokens.get(2));

                    if (position <= list.size() - 1)
                    {
                        list.add(position, element);
                    }
                    break;
                case "Delete":
                    element = Integer.parseInt(tokens.get(1));

                    for (int i = 0; i < list.size(); i++)
                    {
                        if (list.get(i).equals(element) )
                        {
                            list.remove(i);
                            i=-1;
                        }

                    }
                    break;
            }

            tokens = Arrays.stream(reader.nextLine().split("\\s+")).collect(Collectors.toList());
        }

        System.out.println(list.toString().replaceAll("[\\[\\],]",""));
    }
}
