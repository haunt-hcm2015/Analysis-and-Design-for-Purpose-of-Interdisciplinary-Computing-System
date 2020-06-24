public class WordCounter {

	public static void main(String[] args) throws IOException {
		Scanner keyboard = new Scanner(System.in);
		
		System.out.print("Enter a string to count words: ");
		String input = keyboard.nextLine();
		keyboard.close();

		int numberOfWords = wordCount(input);
		System.out.println("The string has " + numberOfWords + " words in it.");
	}
	static int wordCount(String str) {
		StringTokenizer strTok = new StringTokenizer(str);
		return strTok.countTokens();
	}

}