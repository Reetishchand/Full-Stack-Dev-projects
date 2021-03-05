const express = require('express')
const myApp = express()
const fetch = require('node-fetch')
const port = process.env.PORT || 3000

myApp.use(express.static('public'))
myApp.use(express.json({
  limit: '1 mb'
}))

myApp.post('/api', async (request, response) => {
  const post_options = {
    method: 'POST',
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(request.body)
  }
  const apiResponse = await fetch('http://localhost:5000/py_api', post_options)
  const result = await apiResponse.json()
  response.json(result)
})

myApp.listen(port, () => {
  console.log(`Server started – go to http://localhost:${port}`)
})
