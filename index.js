// npm init -y
// npm i express
// npm i mongoose
// YT video 12:51 17:53

//npm i fs --save
const fs = require("node:fs")
const express = require("express")
const mongoose = require("mongoose")


const app = express()
const port = 5500

const User = require("./model/user")

app.use(express.urlencoded({extended: true}))

app.use(express.static('css', { 'Content-Type': 'text/css' }));

app.use(express.static('images'));
app.use(express.static('js'));
app.use(express.static('model'));

mongoose.connect("mongodb://127.0.0.1:27017/GymDB").then(()=>{
    console.log("Database Connnected")
}).catch((e)=>{
    console.log(e)
    console.log("Database can't be connected")
})

app.post("/", async(req, res)=>{
    const userData = new User(req.body)
    await userData.save()
})

app.get("/", (req, res)=>{
    let a = fs.readFileSync("index.html")
    res.send(a.toString())
})

app.listen(port, ()=>{
    console.log("App running on port :", port)
})