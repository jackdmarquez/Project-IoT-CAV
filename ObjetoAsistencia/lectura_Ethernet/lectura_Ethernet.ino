
#include <Ethernet.h>
#include <SPI.h>
#include <Wire.h>
#include <SL018.h>

SL018 rfid;

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte ip[] = { 192, 168, 1, 5 };
//byte server[] = { 192, 168, 1, 6 };
byte server[] = { 192, 168, 1, 3 };

EthernetClient client;

String data;

void setup()
{
  Ethernet.begin(mac, ip);
 // Serial.begin(9600);
  Wire.begin();
  Serial.begin(19200);

  // prompt for tag
  delay(1000);
  Serial.print("My IP address: ");
  Serial.println(Ethernet.localIP());
  
  
  
  data = "";
}

void loop()
{
   if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }
/*
  if (!client.connected()) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();
    for(;;)
      ;
  }
  
  */
 Serial.println("connecting..."); 
 if (client.connect(server, 8080)) {
  Serial.println("connected");
  Serial.println("Show me your tag");
  // start seek mode
  rfid.seekTag();
  // wait until tag detected
  while(!rfid.available());
  // print tag id
  data = "etiqueta=" + String (rfid.getTagString());
  Serial.println(data);
 // delay(3000);
    
  //if (client.connect("192,168,1,3" , 4430)) {
  //Serial.println("Show me your tag");
  //rfid.seekTag();
  // wait until tag detected
  //while(!rfid.available());
  // print tag id
 //Serial.println(rfid.getTagString());
  client.print("GET http://192.168.1.3:8080/algo.php?v=");
  //client.println("POST /algo.php HTTP/1.1");
  //client.println(rfid.getTagString().length());
  
  //client.println("Host: 192,168,1,3"); // SERVER ADDRESS HERE TOO
  //client.println("Content-Type: application/x-www-form-urlencoded"); 
  //client.print("Content-Length: "); 
  //client.println(data.length());

  client.print(rfid.getTagString());
  //client.print(data);
  
  client.println(" HTTP/1.0");
  client.println("User-Agent: Arduino 1.0");
  client.println();
  //Serial.println(data);
  Serial.println("Conexion exitosa");
   } else {
    Serial.println("connection failed");
  }
  
 //client.println("Esto es un id de una etiqueta RFID");
    if (client.connected()) {}
  else {
    Serial.println("Desconectado");
  }
  client.stop();
  client.flush();
  delay(3000);
}

