

#include <SoftwareSerial.h>   //Software Serial Port
#include <Servo.h> 
#define RxD 6
#define TxD 7

#define DEBUG_ENABLED  1

SoftwareSerial blueToothSerial(RxD,TxD);

float analogValueAverage = 0;
float noLoad = 160;
float increment = (888-noLoad)/9;
long t = 0; // 
int timeBetweenReadings = 200; // We want a reading every 200 ms;

int led = 13;
 
Servo myservo;  // create servo object to control a servo 
                // a maximum of eight servo objects can be created 
void setup() 
{ 
  Serial.begin(9600);
  pinMode(RxD, INPUT);
  pinMode(TxD, OUTPUT);
  setupBlueToothConnection();
  pinMode(led, OUTPUT); 
  
  myservo.attach(9);  // attaches the servo on pin 9 to the servo object
  myservo.write(68); 

} 

void dispense()
{
 myservo.write(40);
delay(500);
myservo.write(68);
}
 
void loop() 
{ 
  char recvChar;
  while(1){
    Serial.print("Ready\n");
    if(blueToothSerial.available()){//check if there's any data sent from the remote bluetooth shield
      recvChar = blueToothSerial.read();
      Serial.print(recvChar);
      Serial.print("\nSignal Received\n");
      checkInstr(recvChar);
      delay(1000);
    }
//    if(Serial.available()){//check if there's any data sent from the local serial terminal, you can add the other applications here
//      recvChar  = Serial.read();
//      blueToothSerial.print(recvChar);
//    }
    
  }
} 

void checkInstr(char instr){
  //first instr
      Serial.print("Dispensing\n");
      dispense();
      Serial.print("Dispensed - Done\n");
      scale();
}

void setupBlueToothConnection()
{
  blueToothSerial.begin(38400); //Set BluetoothBee BaudRate to default baud rate 38400
  blueToothSerial.print("\r\n+STWMOD=0\r\n"); //set the bluetooth work in slave mode
  blueToothSerial.print("\r\n+STNA=CookieTEST\r\n"); //set the bluetooth name as "SeeedBTSlave"
  blueToothSerial.print("\r\n+STOAUT=1\r\n"); // Permit Paired device to connect me
  blueToothSerial.print("\r\n+STAUTO=0\r\n"); // Auto-connection should be forbidden here
  delay(2000); // This delay is required.
  blueToothSerial.print("\r\n+INQ=1\r\n"); //make the slave bluetooth inquirable 
  Serial.println("The slave bluetooth is inquirable!");
  delay(2000); // This delay is required.
  blueToothSerial.flush();
}

void scale(){
  float analogValue = analogRead(4);

  //analogValueAverage = 0.99*analogValueAverage + 0.01*analogValue;

  char load = mapfloat(analogValue);
  Serial.print("analogValue: ");Serial.println(analogValue);
  Serial.print(" load: ");Serial.println(load);

  blueToothSerial.print(load);

}

char mapfloat(float x)
{
    if(x <195)
      return 'z';

      
    if (x > 195 && x <= 210)
    return '0';
    
    
    if (x > 210 && x <= 225)
    return '1';
    
    if (x > 225 && x <= 237)
    return '2';
    
    if (x > 237 && x <= 252)
    return '3';
    
    if (x > 252 && x <= 265)
    return '4';
    
    if (x > 265 && x <= 280)
    return '5';
    
    if (x > 280 && x <= 300)
    return '6';
    
    if (x > 301 && x <= 315)
    return '7';
    
    if (x > 315 && x <= 330)
    return '8';
  
    if (x > 330 && x < 350)
    return '9';
    
    if (x > 350)
      return '9';
    
}
