function getBotResponse(input) {
    //rock paper scissors
    if (input == "is there any offers going on?") {
        return "Unfortunately not at the moment :( But keep an eye on our website there are many offers on the way!!";
    } else if (input == "do you have any discount?") {
        return "Use code 'aamir10' and get 10% discount on any service you like!!";
    } else if (input == "what are the payment options?") {
        return "You can pay online or you can directly pay at the salon!!";
    }
    else if (input == "how to register?") {
        return " Go on " +'localhost/wpl/reg_final.php';
    }

    // Simple responses
    if (input == "hello" || input == "hi" || input == "heyy" || input == "wassup") {
        return "Hello there! How can I help you?";
    } else if (input == "goodbye" || input == "bye") {
        return "Have a nice day ahead!!!";
    } else {
        return "Try asking something else!";
    }
}