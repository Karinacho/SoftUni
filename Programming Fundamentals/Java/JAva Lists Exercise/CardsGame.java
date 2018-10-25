import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;
import java.util.stream.Collectors;
import java.util.stream.IntStream;

public class CardsGame {
    public static void main(String[] args) {
        Scanner reader = new Scanner(new InputStreamReader(System.in));
        List<Integer> firstPlayer = Arrays.stream(reader.nextLine().split("\\s+"))
                .map(Integer::parseInt)
                .collect(Collectors.toCollection(ArrayList::new));

        List<Integer> secondPlayer = Arrays.stream(reader.nextLine().split("\\s+"))
                .map(Integer::parseInt)
                .collect(Collectors.toCollection(ArrayList::new));

        while (true) {
            if (firstPlayer.get(0) > secondPlayer.get(0)) {
                firstPlayer.add(firstPlayer.get(0));
                firstPlayer.add(secondPlayer.get(0));
                firstPlayer.remove(0);
                secondPlayer.remove(0);
            } else if (firstPlayer.get(0) < secondPlayer.get(0)) {
                secondPlayer.add(secondPlayer.get(0));
                secondPlayer.add(firstPlayer.get(0));
                secondPlayer.remove(0);
                firstPlayer.remove(0);
            } else if (firstPlayer.get(0).equals(secondPlayer.get(0))) {
                firstPlayer.remove(0);
                secondPlayer.remove(0);
            }

            if (firstPlayer.size() == 0) {
                int sum = 0;

                for( int num : secondPlayer) {
                    sum = sum+num;
                }
                System.out.printf("Second player wins! Sum: %d", sum);
                break;

            } else if (secondPlayer.size() == 0) {
                int sum = 0;

                for( int num : firstPlayer) {
                    sum = sum+num;
                }
                System.out.printf("First player wins! Sum: %d",sum);
             break;

            }
        }
    }
}
