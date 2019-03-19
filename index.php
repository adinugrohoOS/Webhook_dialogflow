<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'GET'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->metadata->intentName->text;

	switch ($text) {
		case 'Assalamualaikum':
			$speech = "Waalaikumsalam";
			break;

		case 'Apa kabar':
			$speech = "Kabar baik, bagaimana dengan anda ?";
			break;

		case 'Siapa kamu':
			$speech = "Saya adalah virtual asisten dari restaoran ini";
			break;
		
		default:
			$speech = "Maaf saya kurang mengerti, silahkan bertanya yang lain.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
