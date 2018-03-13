using System;

namespace _01.DayOfWeek
{
    internal class Program
    {
        private static void Main(string[] args)
        {
            string[] days =
            {
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday"
            };

            var dayNum = int.Parse(Console.ReadLine());
            if (dayNum >= 1 && dayNum <= 7)
                Console.WriteLine(days[dayNum - 1]);
            else
                Console.WriteLine("Invalid Day!");
        }
    }
}