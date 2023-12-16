const { text } = require("body-parser")
const mongoose = require("mongoose")

const userData = new mongoose.Schema({

        fullname:{
            type: String
  
        },
        email:{
            type: String

        },
        gender:{
            type: String

        },
        mobile:{
            type: Number

        },
        fulladdress:{
            type: String

        },
        DOB:{
            type: Date

        },
        plan:{
            type: String

        }

})

const User = mongoose.model("User", userData)
module.exports = User