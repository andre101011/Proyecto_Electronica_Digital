#include <ESP8266WiFi.h>
#include <WiFiClient.h>

//-------------------VARIABLES GLOBALES--------------------------
int contconexion = 0;

const char *ssid = "linksys";
const char *password = "123456789";

unsigned long previousMillis = 0;

char host[48];
String strhost = "192.168.1.205";
String strurl = "/proyecto/enviardatos.php";
String chipid = "";

const int PUERTA = 5;
const int VIDEO_BEAM = 4;
const int SENSOR_MOVIMIENTO = 14;

int puerta;
int videoBeam;
int sensorMovimiento;

boolean nuevoDato = false;

//-------Función para Enviar Datos a la Base de Datos SQL--------

String enviardatos(String datos)
{
  String linea = "error";
  WiFiClient client;
  strhost.toCharArray(host, 49);
  if (!client.connect(host, 80))
  {
    Serial.println("Fallo de conexion");
     return enviardatos(datos);
  }

  client.print(String("POST ") + strurl + " HTTP/1.1" + "\r\n" +
               "Host: " + strhost + "\r\n" +
               "Accept: */*" + "*\r\n" +
               "Content-Length: " + datos.length() + "\r\n" +
               "Content-Type: application/x-www-form-urlencoded" + "\r\n" +
               "\r\n" + datos);
  delay(10);

  Serial.print("Enviando datos a SQL...");

  unsigned long timeout = millis();
  while (client.available() == 0)
  {
    if (millis() - timeout > 5000)
    {
      Serial.println("Cliente fuera de tiempo!");
      client.stop();
      return linea;
    }
  }
  // Lee todas las lineas que recibe del servidro y las imprime por la terminal serial
  while (client.available())
  {
    linea = client.readStringUntil('\r');
  }
  Serial.println(linea);
  return linea;
}


void conectar()
{
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED )   //Cuenta hasta 50 si no se puede conectar lo cancela
  {
    delay(500);
    Serial.print(".");
  }

  puerta = digitalRead(PUERTA);
  videoBeam = digitalRead(VIDEO_BEAM);
  sensorMovimiento = digitalRead(SENSOR_MOVIMIENTO);

  
  Serial.println("");
  Serial.println("WiFi conectado");
  Serial.println(WiFi.localIP());
  enviardatos("chipid=" + chipid + "&puerta=" + puerta + "&videoBeam=" + videoBeam + "&sensorMovimiento=" + sensorMovimiento);
}


void setup() {

  pinMode(PUERTA, INPUT);
  pinMode(VIDEO_BEAM, INPUT);
  pinMode(SENSOR_MOVIMIENTO, INPUT);

  puerta = digitalRead(PUERTA);
  videoBeam = digitalRead(VIDEO_BEAM);
  sensorMovimiento = digitalRead(SENSOR_MOVIMIENTO);

  // Inicia Serial
  Serial.begin(115200);
  Serial.println("");

  Serial.print("chipId: ");
  chipid = String(ESP.getChipId());
  Serial.println(chipid);
  conectar();
  // Conexión WIFI
  //para usar con ip fija
  //IPAddress ip(192,168,1,156);
  //IPAddress gateway(192,168,1,1);
  //IPAddress subnet(255,255,255,0);
  // WiFi.config(ip, gateway, subnet);


}

//--------------------------LOOP--------------------------------
void loop()
{
  // si no hay un nuevo datos sigue leyendo los sensores a la espera de un cambio
  while (nuevoDato == false)
  {
    if(WiFi.status() != WL_CONNECTED )
    {
      conectar();
    }
    int lecPuerta = digitalRead(PUERTA);
    int lecVideoBeam = digitalRead(VIDEO_BEAM);
    int lecSensorMovimiento = digitalRead(SENSOR_MOVIMIENTO);
    nuevoDato = !(lecPuerta == puerta && lecVideoBeam == videoBeam && lecSensorMovimiento == sensorMovimiento );
    delay(30);
  }
  Serial.println(chipid);

  // toma el valor actual de los sensores
  puerta = digitalRead(PUERTA);
  videoBeam = digitalRead(VIDEO_BEAM);
  sensorMovimiento = digitalRead(SENSOR_MOVIMIENTO);


  String mensaje =  "Puerta: " + String(puerta) + " Video Beam: " + String(videoBeam) + " Sensor: " + String(sensorMovimiento);
  Serial.println(mensaje);
  enviardatos("chipid=" + chipid + "&puerta=" + puerta + "&videoBeam=" + videoBeam + "&sensorMovimiento=" + sensorMovimiento);

  nuevoDato = false;


}
