//This is the C# aspect to be written in Unity
string phoneNumber = "+2547XXXXXX";
// depending on hte logic you might want to initialize this in you Update Function
string WebURL = "/../requestpayment.php?number="+WWW.EscapeURL(phoneNumber);
string transactionid; //For each transaction's Id
string confirmURL = "/../confirmpayment.php?id="+WWW.EscapeURL(transactionid);

//This is usually called on button press
public void purchase()
{

		StartCoroutine(GetItem());
}

IEnumerator GetItem() {
		WWW www = new WWW(WebURL);

        //We can also show the progress as the app retrieves content from the php script
		while(!www.isDone && string.IsNullOrEmpty(www.error)) {
			//Debug.Log("Loading... " + www.progress.ToString ("0%")); //Shows progress of the download
			yield return null;
		}

        //To check and make sure we have no errors we can then run our logic in the if condition
		if (string.IsNullOrEmpty (www.error)) {
			//There are no errors with retrieving so we can continue
            //We retrieve the transaction ID from the echo in the request script and pass it into the confirm script
            transactionid = www.text;
		}
		else { 
            //Display the errors in the console
			Debug.LogWarning (www.error);
		}
}

//This is also called with a button. You can use a button to ask the user to confirm their choice from the payment
public void confirm()
{
		StartCoroutine (confirmPayment());
}

	IEnumerator confirmPayment()
	{
		WWW www = new WWW(confirmurl);

		while(!www.isDone && string.IsNullOrEmpty(www.error)) {
			test.text = "Loading... " + www.progress.ToString ("0%"); //Show progress
			yield return null;
		}

        //To check and make sure we have no errors we can then run our logic in the if condition
		if (string.IsNullOrEmpty (www.error)) {
			if (www.text == "Success") {
				//Perform some logic like adding 50 gold coins
			}
            else
            {
                //Transaction wasn't successful
            }
		}
		else { 
			Debug.LogWarning (www.error);
		}

	}
