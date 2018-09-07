using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Softuni_planning
{
    class Program
    {
        static void Main(string[] args)
        {
            var input = Console.ReadLine()
                .Split(new string[] { ", " }, StringSplitOptions.RemoveEmptyEntries).ToList();
            var command = String.Empty;
            while ((command = Console.ReadLine()) != "course start")
            {
                var tokens = command.Split(new char[] { ':' });
                if (tokens[0] == "Add")
                {
                    if (!input.Contains(tokens[1]))
                    {
                        input.Add(tokens[1]);
                    }
                }
                else if (tokens[0] == "Insert")
                {
                    if (!input.Contains(tokens[1]))
                    {
                        var index = int.Parse(tokens[2]);
                        if (index >= 0 && index <= input.Count - 1)
                        {
                            input.Insert(index, tokens[1]);
                        }
                    }

                }
                else if (tokens[0] == "Remove")
                {
                    if (input.Contains(tokens[1]))
                    {
                        var lessonIndex = input.IndexOf(tokens[1]);
                        if (input[lessonIndex + 1] == $"{tokens[1]}-Exercise")
                        {
                            input.RemoveRange(lessonIndex, 2);
                        }
                        else
                        {
                            input.RemoveAt(lessonIndex);
                        }
                    }
                }
                else if (tokens[0] == "Swap")
                {
                    if (input.Contains(tokens[1]) && input.Contains(tokens[2]))
                    {
                        var first = input.IndexOf(tokens[1]);
                        var second = input.IndexOf(tokens[2]);
                        var temp = input[first];
                        var secondExe = " ";
                        var firstExe = " ";
                        if (first + 1 > 0 && first + 1 < input.Count)
                        {
                            firstExe = input[first + 1];

                        }
                        if (second + 1 > 0 && second + 1 < input.Count)
                        {
                            secondExe = input[second + 1];
                        }
                        if (firstExe != " " || secondExe != " ")
                        {
                            input[first] = input[second];

                            input[second] = temp;
                            if (secondExe == $"{tokens[2]}-Exercise")
                            {
                                input.RemoveAt(second + 1);
                                first= input.IndexOf(tokens[2]);
                                input.Insert(first + 1, secondExe);


                            }
                            else if (firstExe == $"{tokens[1]}-Exercise")
                            {
                                input.RemoveAt(first + 1);
                                second = input.IndexOf(tokens[1]);
                                input.Insert(second + 1, firstExe);

                            }
                        }
                        else
                        {
                            input[first] = input[second];

                            input[second] = temp;

                        }
                    }
                }

                else if (tokens[0] == "Exercise")
                {
                    if (input.Contains(tokens[1]))
                    {
                        if (!input.Contains($"{tokens[1]}-Exercise"))
                        {
                            var index = input.IndexOf(tokens[1]);
                            input.Insert(index, $"{tokens[1]}-Exercise");
                        }
                    }
                    else
                    {
                        input.Add($"{tokens[1]}");
                        input.Add($"{tokens[1]}-Exercise");
                    }
                }


            }
            for (int i = 0; i < input.Count; i++)
            {
                Console.WriteLine($"{i + 1}.{input[i]}");
            }


        }
    }
}
