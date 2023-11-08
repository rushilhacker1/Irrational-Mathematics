const fs = require("fs")
const https = require("https")
const port = 3000

const https_certificates = {
  key: fs.readFileSync('key.pem'), // Update with your actual private key path
  cert: fs.readFileSync('cert.pem'), // Update with your actual certificate path
};

const server = https.createServer( https_certificates,
    function(req, res){
        res.writeHead(200, { 'Content-Type': 'text/html' })
        const userAgent = req.headers['user-agent'];
        if (userAgent && userAgent.toLowerCase().includes('mobile')){
            fs.readFile('b.htm', function(error, data){
                if (error) {
                    res.writeHead(404)
                    res.write('Error: File Not Found')
                } else {
                    res.write(data)
                }
                res.end()
            })
        } else {
            fs.readFile('a.htm', function(error, data){
                if (error) {
                    res.writeHead(404)
                    res.write('Error: File Not Found')
                } else {
                    res.write(data)
                }
                res.end()
            })
        }
    }
)

server.listen(port, function(error){
    if(error) {
        console.log('Something went wrong, ' + error)
    } else {
        console.log("Server is listening on port " + port);
    }
})