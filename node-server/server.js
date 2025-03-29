const express = require('express');
const puppeteer = require('puppeteer');
const cors = require('cors');

const app = express();
app.use(cors());

app.get('/screenshot', async (req, res) => {
    const url = req.query.url;
    if (!url) return res.status(400).json({ error: "URL is required" });

    try {
        const browser = await puppeteer.launch({ headless: "new" });
        const page = await browser.newPage();

        // Set viewport size (optional)
        await page.setViewport({ width: 1200, height: 600 });

        // Navigate and wait until all network requests are done
        await page.goto(url, { waitUntil: 'networkidle0', timeout: 60000 });
        
        const screenshot = await page.screenshot({ encoding: 'base64' });

        await browser.close();
        res.json({ screenshot: `data:image/png;base64,${screenshot}` });
    } catch (error) {
        res.status(500).json({ error: "Failed to capture screenshot", details: error.message });
    }
});

app.listen(3000, () => console.log('Node.js server running on port 3000'));
