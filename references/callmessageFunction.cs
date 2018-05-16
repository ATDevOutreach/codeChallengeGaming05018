//This is the C# aspect in Unity
string phoneNumber = "+2547XXXXXX";
// depending on the logic you might want to initialize this in you Update Function
string WebURL = "/../requestpayment.php?number="+WWW.EscapeURL(phoneNumber);

public void message()
{
    //You can attach this to a button
    StartCoroutine(SendMessage());
}

IEnumerator SendMessage()
{
    WWW www = new WWW(WebURl);

    //We can also show the progress as the app retrieves content from the php script
    while(!www.isDone && string.IsNullOrEmpty(www.error))
    {
        Debug.Log(www.progress.ToString());
        yield return null;
    }
     //To check and make sure we have no errors we can then run our logic in the if condition
    if(string.isNullOrEmpty(www.error))
    {
        //There are no errors with retrieving so we can continue
        if(www.text=="Successful")
        {
            //Do logic
        }
        else
        {
            //Message Sending Not Successful
        }

    }
    else
    Debug.LogWarning(www.error);
}
