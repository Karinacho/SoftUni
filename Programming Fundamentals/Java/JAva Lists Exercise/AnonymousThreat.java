import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.stream.Collectors;

public class AnonymousThreat {
    public static List<String> words = new ArrayList<>();

    public static void main(String[] args) throws IOException {
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));

        words = Arrays.stream(reader.readLine().split("\\s+")).collect(Collectors.toList());

        String command = "";

        while (!"3:1".equalsIgnoreCase(command = reader.readLine())) {
            String[] tokens = command.split("\\s+");
            int index = Integer.parseInt(tokens[1]);
            int commandNum = Integer.parseInt(tokens[2]);

            switch (tokens[0]) {
                case "merge":
                    mergeWords(index, commandNum);
                    break;
                case "divide":
                    divideWords(index,commandNum);
                    break;
                default:
                    break;
            }
        }

        System.out.println(String.join(" ",words));
    }

    private static void divideWords(int index, int partitions) {
        String wordForDivision = words.get(index);
        words.set(index," ");
        int parts = wordForDivision.length() / partitions;
        String[] newWords = new String[partitions];
        int stringIndex = 0;
        int i = 0;
        while(partitions-- >0){
            if(i == newWords.length-1){
                words.add(index,wordForDivision.substring(stringIndex));
            }
            else {
                words.add(index,wordForDivision.substring(stringIndex, stringIndex + parts));
            }
            stringIndex+=parts;
            i++;
            index++;
        }

        words.removeIf(s -> s.equals(" "));

    }

    private static void mergeWords(int startIndex, int endIndex) {
        if (startIndex < 0 || startIndex > words.size()-1) {
            startIndex = 0;
        }
        if (endIndex >= words.size()) {
            endIndex = words.size() - 1;
        }
        int tempIndex = startIndex;
        StringBuilder mergedWords = new StringBuilder();

        while(tempIndex<=endIndex){
            mergedWords.append(words.get(tempIndex));
            words.set(tempIndex," ");
            tempIndex++;
        }

        words.set(startIndex,mergedWords.toString());
        words.removeIf(s -> s.equals(" "));

    }

}
