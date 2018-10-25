import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.stream.Collectors;

public class drumSet {
    public static void main(String[] agrs) throws IOException {
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
        double budget = Double.parseDouble(reader.readLine());

        int[] numlist = Arrays
                .stream(reader.readLine().split(" "))
                .mapToInt(Integer::parseInt)
                .toArray();
        List<Integer> input = Arrays.stream(numlist).boxed().collect(Collectors.toList());
        ArrayList<Integer> saved = new ArrayList<Integer>();
        for (int i = 0; i < input.size(); i++) {
            saved.add(i, input.get(i));
        }

        int number;
        while (true) {
            String command = reader.readLine();
            if (command.equals("Hit it again, Gabsy!")) {
                break;
            } else {

                number = Integer.valueOf(command);
            }
            for (int i = 0; i < input.size(); i++) {
                input.add(i, input.get(i) - number);
                input.remove(i + 1);
                if (input.get(i) <= 0) {

                    if ( budget - 3 * saved.get(i)>=0) {
                        budget -= 3 * saved.get(i);
                        input.remove(i);
                        input.add(i, saved.get(i));
                    } else {
                        input.remove(i);
                        saved.remove(i);
                        i--;

                    }
                }

            }

        }
        for (int anInput : input) {
            System.out.print(anInput + " ");

        }
        System.out.println();
        System.out.printf("Gabsy has %.2flv.", budget);

    }
}
