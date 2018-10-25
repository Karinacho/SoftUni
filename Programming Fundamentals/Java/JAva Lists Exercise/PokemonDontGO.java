import java.util.Scanner;
import java.util.ArrayList;

public class PokemonDontGO {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String txt = sc.nextLine();
        String[] numss = txt.split(" ");
        ArrayList<Integer> num = new ArrayList<Integer>();
        int i = 0;
        int sum = 0;
        while (i < numss.length) {
            int myInt = Integer.parseInt(numss[i]);
            num.add(myInt);
            i++;
        }

        int idx = -1;
        do {

            idx = Integer.parseInt(sc.nextLine());
            int numb = -1;

            if (idx < 0) {
                numb = num.get(0);
                num.set(0, Integer.valueOf(num.get(num.size() - 1)));
            } else if (idx >= num.size()) {
                numb = num.get(num.size() - 1);
                num.set(num.size() - 1, Integer.valueOf(num.get(0)));
            } else {
                numb = num.get(idx);
                num.remove(idx);
            }
            sum += numb;
            for (i = 0; i < num.size(); i++) {
                if (num.get(i) <= numb) {
                    num.set(i, Integer.valueOf(num.get(i) + numb));
                } else {
                    num.set(i, Integer.valueOf(num.get(i) - numb));
                }
            }

        } while (!num.isEmpty());
        System.out.println(sum);

        sc.close();
    }

}

