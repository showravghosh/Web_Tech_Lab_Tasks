function analyzeText() {
    let text = document.getElementById("inputText").value;

    if (text.trim() === "") {
        document.getElementById("charCount").innerHTML = 0;
        document.getElementById("wordCount").innerHTML = 0;
        document.getElementById("reverseText").innerHTML = "";
        return;
    }

    let charCount = text.length;

    let words = text.trim().split(/\s+/);
    let wordCount = words.length;

    let reversed = text.split("").reverse().join("");

    document.getElementById("charCount").innerHTML = charCount;
    document.getElementById("wordCount").innerHTML = wordCount;
    document.getElementById("reverseText").innerHTML = reversed;
}
