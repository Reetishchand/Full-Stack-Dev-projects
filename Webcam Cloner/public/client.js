const videoDestectionRate = 1
const liveVedio = document.getElementById('video')
const canvasWebCam = document.getElementById('webcam_canvas')
const canvasResponse = document.getElementById('response_canvas')
const contextCam = canvasWebCam.getContext('2d')
const contextReponse = canvasResponse.getContext('2d')

function startWebCam() {
  navigator.getUserMedia(
    { video: {} },
    stream => liveVedio.srcObject = stream,
    error => console.error(error)
  )
}

function intializeCanvas() {
  canvasWebCam.width = liveVedio.videoWidth
  canvasWebCam.height = liveVedio.videoHeight
  canvasResponse.width = liveVedio.videoWidth
  canvasResponse.height = liveVedio.videoHeight
}

function parseVideo() {
  contextCam.drawImage(liveVedio, 0, 0, canvasWebCam.width, canvasWebCam.height)
  requestAnimationFrame(parseVideo)
}

startWebCam()
liveVedio.addEventListener('play', () => {
  intializeCanvas()
  requestAnimationFrame(parseVideo)
  setInterval(async () => {
    const base64 = canvasWebCam.toDataURL()
    const request = {image64: base64}
    const apiOptions = {
      method: 'POST',
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(request)
    }
    const response = await fetch('/api', apiOptions)
    const result = await response.json()
    const image64 = result['image64']
    
    const drawImage = new Image();
    drawImage.onload = () => {
      contextReponse.drawImage(drawImage, 0, 0, canvasResponse.width, canvasResponse.height);
    }
    drawImage.src = image64
    
  }, videoDestectionRate)
})
