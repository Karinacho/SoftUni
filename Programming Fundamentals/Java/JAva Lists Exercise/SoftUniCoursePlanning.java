

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.stream.Collectors;

public class SoftUniCoursePlanning {
    private static BufferedReader reader;
    private static List<String> lessons;

    static {
        reader = new BufferedReader(new InputStreamReader(System.in));
    }

    public static void main(String[] args) throws IOException {
        getInitialList();
        String input;
        while (! "course start".equals(input = reader.readLine())) {
            String[] tokens = input.split(":");
            String command = tokens[0];
            String lessonTitle = tokens[1];

            switch (command) {
                case "Add":
                    addLesson(lessonTitle);
                    break;
                case "Insert":
                    insertLesson(tokens[2], lessonTitle);
                    break;
                case "Remove":
                    removeLessons(lessonTitle);
                    break;
                case "Swap":
                    swapLessons(tokens[2], lessonTitle);
                    break;
                case "Exercise":
                    String exercise = String.format("%s-Exercise", lessonTitle);
                    int lessonIndex = lessons.indexOf(lessonTitle);
                    int lessonExerciseIndex = lessons.indexOf(exercise);
                    if (lessonIndex >= 0 && lessonExerciseIndex == - 1) {
                        lessons.add(lessonIndex + 1, exercise);
                    }
                    if (lessonIndex == - 1) {
                        lessons.add(lessonTitle);
                        lessons.add(exercise);
                    }
                    break;
            }
        }

        for (int i = 0; i < lessons.size(); i++) {
            System.out.println(String.format("%d.%s", i + 1, lessons.get(i)));
        }
    }

    private static void swapLessons(String otherLessonTitle, String lessonTitle) {
        int lessonIndex = lessons.indexOf(lessonTitle);
        int otherLessonIndex = lessons.indexOf(otherLessonTitle);
        if (lessonIndex >= 0 && otherLessonIndex >= 0) {
            lessons.set(lessonIndex, otherLessonTitle);
            lessons.set(otherLessonIndex, lessonTitle);

            int lessonExerciseIndex = lessons.indexOf(String.format("%s-Exercise", lessonTitle));
            if (lessonExerciseIndex >= 0) {
                String exercise = lessons.remove(lessonExerciseIndex);
                lessons.add(otherLessonIndex + 1, exercise);
            }

            int otherLessonExerciseIndex = lessons.indexOf(String.format("%s-Exercise", otherLessonTitle));
            if (otherLessonExerciseIndex >= 0) {
                String exercise = lessons.remove(otherLessonExerciseIndex);
                lessons.add(lessonIndex + 1, exercise);
            }
        }
    }

    private static void removeLessons(String lessonTitle) {
        lessons.removeIf(lesson -> lesson.startsWith(lessonTitle));
    }

    private static void insertLesson(String token, String lessonTitle) {
        int index = lessons.indexOf(lessonTitle);
        int insertIndex = Integer.parseInt(token);
        if (index == - 1 && isValid(insertIndex)) {
            lessons.add(insertIndex, lessonTitle);
        }
    }

    private static void addLesson(String lessonTitle) {
        int index = lessons.indexOf(lessonTitle);
        if (index == - 1) {
            lessons.add(lessonTitle);
        }
    }

    private static boolean isValid(int index) {
        return index >= 0;
    }

    private static void getInitialList() throws IOException {
        lessons = Arrays.stream(reader.readLine().split(", "))
                .collect(Collectors.toCollection(ArrayList::new));
    }
}
