<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = $_POST["response"];

    if ($response === "No") {
        // Discord webhook URL
        $webhookUrl = "https://discord.com/api/webhooks/1204198223531745433/ybQATjS5AaI12BRBw82HOUCcpe-YsC1omzp6jEA2khIqGV-DGAf2e6ELUBbrba3OAnLw";

        // Message to be sent to Discord
        $message = "No was clicked at " . date("Y-m-d H:i:s");

        // Prepare data for HTTP POST request
        $postData = array('content' => $message);
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($postData),
            ),
        );
        $context = stream_context_create($options);
        $result = file_get_contents($webhookUrl, false, $context);

        // You can handle the result if needed
        // For example, check if the message was sent successfully
        if ($result === false) {
            echo "Failed to send message to Discord.";
        } else {
            echo "Message sent to Discord successfully!";
        }
    }
}
?>
