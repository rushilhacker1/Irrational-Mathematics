import { Console } from "console";

// const fs = require("fs");
const express = require("express");

const app = express();
const port = process.env.PORT || 4000;

const logFilePath = "server.log";


const constantsDirectory = "public/constants";

function readHtmlFile(filePath, res) {
  fs.readFile(filePath, (error, data) => {
    if (error) {
      res.writeHead(404);
      res.write("Error: File Not Found");
      logError(`Error reading file: ${filePath}`);
    } else {
      res.write(data);
      logInfo(`File ${filePath} served successfully`);
    }
    res.end();
  });
}

function logInfo(message) {
  const logEntry = `[INFO] ${getCurrentDateTime()} - ${message}\n`;
  fs.appendFile(logFilePath, logEntry, (err) => {
    if (err) console.error(`Error writing to log file: ${err}`);
  });
}

function logError(message) {
  const logEntry = `[ERROR] ${getCurrentDateTime()} - ${message}\n`;
  fs.appendFile(logFilePath, logEntry, (err) => {
    if (err) console.error(`Error writing to log file: ${err}`);
  });
}

function getCurrentDateTime() {
  const now = new Date();
  return now.toISOString();
}

// Read data from files in /constants directory and store it in RAM on server startup
fs.readdirSync(constantsDirectory).forEach((fileName) => {
  const filePath = `${constantsDirectory}/${fileName}`;
  const fileData = fs.readFileSync(filePath, "utf8");
  dataInRam[fileName] = fileData;
});

app.get("/names", (req, res) => {
  const fileNames = fs.readdirSync(constantsDirectory);
  res.json({ names: fileNames });
});

app.get("/data/:fileName", (req, res) => {
  const fileName = req.params.fileName;
  const filePath = `${constantsDirectory}/${fileName}`;
    try{
      const fileData = fs.readFileSync(filePath, "utf8");
      dataInRam[fileName] = fileData;
      res.json({ fileName, data: fileData });
    } catch (error) {
      res.status(404).json({ error: "File not found" });
    }
});

app.get("/", (req, res) => {
  res.writeHead(200, { "Content-Type": "text/html" });
  const userAgent = req.headers["user-agent"];

  if (userAgent && userAgent.toLowerCase().includes("mobile")) {
    readHtmlFile("public/mobile/home.html", res);
  } else {
    readHtmlFile("public/home.html", res);
  }
});

app.get("/About", (req,res) =>{
  res.writeHead(200, { "Content-Type": "text/html" });
  const userAgent = req.headers["user-agent"];

  if (userAgent && userAgent.toLowerCase().includes("mobile")) {
    readHtmlFile("public/mobile/About_us.html", res);
  } else {
    readHtmlFile("public/About_us.html", res);
  }
})
app.get("/Contact", (req,res) =>{
  res.writeHead(200, { "Content-Type": "text/html" });
  const userAgent = req.headers["user-agent"];

  if (userAgent && userAgent.toLowerCase().includes("mobile")) {
    readHtmlFile("public/mobile/Contact.html", res);
  } else {
    readHtmlFile("public/Contact.html", res);
  }
})
app.get("/support", (req,res) =>{
  res.writeHead(200, { "Content-Type": "text/html" });
  const userAgent = req.headers["user-agent"];

  if (userAgent && userAgent.toLowerCase().includes("mobile")) {
    readHtmlFile("public/mobile/support_us.html", res);
  } else {
    readHtmlFile("public/support_us.html", res);
  }
})

app.get("/jjj", (req,res) =>{
Console.log("crccdcdwdw")
})

module.exports = app;


