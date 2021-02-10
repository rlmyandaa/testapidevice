/*
  Simple POST client for ArduinoHttpClient library
  Connects to server once every five seconds, sends a POST request
  and a request body

  created 14 Feb 2016
  modified 22 Jan 2019
  by Tom Igoe

  this example is in the public domain
*/
#include <ArduinoHttpClient.h>
#include <WiFi.h>
#include <ArduinoJson.h>

///////please enter your sensitive data in the Secret tab/arduino_secrets.h
/////// Wifi Settings ///////
#define SECRET_SSID "WHYRED_9671"
#define SECRET_PASS "blableuh123"

char ssid[] = SECRET_SSID;
char pass[] = SECRET_PASS;

//ALAMAT SERVER DAN PORT
char serverAddress[] = "testapi.l0wpass.site";  // server address
int port = 80;

WiFiClient client;
HttpClient http(client, serverAddress, port);
int status = WL_IDLE_STATUS;

void setup() {
  Serial.begin(9600);
  while ( WiFi.begin(ssid, pass) != WL_CONNECTED) {
    Serial.print("failed ... ");
    delay(4000);
    Serial.print("retrying ... ");
  }
  Serial.println("connected");
  // print the SSID of the network you're attached to:
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());

  // print your WiFi shield's IP address:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);
}

void loop() {

  //JSON REQUEST DATA
  DynamicJsonDocument doc(1024);
  doc["card_id"] = "6721dghs";
  String request;
  serializeJson(doc, request);
  Serial.println(request);
  //JSON DATA
  
  //DATA API URL
  String requestUrl = "/api/data";

  postData(request, requestUrl);
  Serial.println("Wait five seconds");
  delay(5000);
}

void postData(String requestData, String requestUrl) {
  Serial.println("making POST request");
  String contentType = "application/json";
  http.post(requestUrl, contentType, requestData);

  // read the status code and body of the response
  int statusCode = http.responseStatusCode();
  String response = http.responseBody();

  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("Response: ");
  Serial.println(response);
}
