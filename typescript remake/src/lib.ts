import * as http from 'http';
import * as url from 'url';

/**
 * Represents an HTML tag with its attributes and content.
 */
class HTMLTag {
    tagName: string;
    content: string;
    attributes: Record<string, string>;

    /**
     * List of self-closing tags.
     */
    private selfClosingTags = ['meta', 'br', 'img', 'input', 'link', 'hr'];

    constructor(tagName: string, content: string | HTMLTag[] = '', attributes: Record<string, string> = {}) {
        this.tagName = tagName;
        this.content = Array.isArray(content)
            ? content.map(singleContent => singleContent.render()).join('')
            : content;
        this.attributes = attributes;
    }

    setContent(content: string) {
        this.content = content;
    }

    setAttribute(name: string, value: string) {
        this.attributes[name] = value;
    }

    private escape(value: string) {
        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

    /**
     * Renders the HTML tag as a string.
     * @returns {string} - The rendered HTML tag.
     */
    render() {
        const attributes = this.renderAttributes();
        
        // If it's a self-closing tag, return it without content and closing tag.
        if (this.selfClosingTags.includes(this.tagName)) {
            return `<${this.tagName} ${attributes} />`;
        }
        
        // Otherwise, return a standard opening/closing tag with content.
        return `<${this.tagName} ${attributes}>${this.content}</${this.tagName}>`;
    }

    private renderAttributes() {
        return Object.entries(this.attributes)
            .map(([key, value]) => `${key}="${this.escape(value)}"`)
            .join(' ');
    }
}

/**
 * Represents an HTML page composed of various HTMLTags.
 */
class HTMLPage {
    private content: string;

    constructor(name: string, desc: string, elements: HTMLTag[], lang: string = 'pl') {
        this.content = `<!DOCTYPE html><html lang="${lang}"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content="${desc}"><title>${name} - Gorciu.NET</title></head><body>${elements.map(element => element.render()).join('')}</body></html>`;
    }

    getHTML(): string {
        return this.content;
    }
}

/**
 * Represents a HTTP server for serving HTML pages and static assets.
 */
class Server {
    private port: number;
    private routes: Record<string, (cookies: Record<string, string>) => HTMLPage>;
    private runned: boolean = false;

    constructor(port: number = 3000) {
        this.port = port;
        this.routes = {};
    }

    /**
     * Parses cookies from the request headers.
     * @param {http.IncomingMessage} req The incoming HTTP request.
     * @returns {Record<string, string>} Parsed cookies as key-value pairs.
     */
    private parseCookies(req: http.IncomingMessage): Record<string, string> {
        const cookieHeader = req.headers.cookie;
        if (!cookieHeader) {
            return {};
        }

        return cookieHeader.split(';').reduce((cookies: Record<string, string>, cookie: string) => {
            const [name, value] = cookie.split('=').map(c => c.trim());
            cookies[name] = decodeURIComponent(value);
            return cookies;
        }, {});
    }

    /**
     * Adds a route to the server that generates HTMLTags based on cookies.
     * @param {string} path The path of the route.
     * @param {(cookies: Record<string, string>) => HTMLPage} handler A function that generates HTMLTags based on cookies.
     */
    addRoute(path: string, handler: (cookies: Record<string, string>) => HTMLPage) {
        this.routes[path] = handler;
    }

    /**
     * Starts the HTTP server.
     */
    startServer() {
        const server = http.createServer((req, res) => {
            const parsedUrl = url.parse(req.url || '', true);
            const cookies = this.parseCookies(req);

            const routeHandler = this.routes[parsedUrl.pathname || '/'];
            res.statusCode = routeHandler ? 200 : 404;
            res.setHeader('Content-Type', 'text/html');

            if (routeHandler) {
                const page = routeHandler(cookies);
                res.end(page.getHTML());
            } else {
                res.end('<h1>404 - Not Found</h1>');
            }
        });

        server.listen(this.port, () => {
            console.log(`Server running at http://localhost:${this.port}`);
            this.runned = true;
        });
    }

    /**
     * Executes a handler once the server is running.
     * @returns {Promise<any>} A promise that resolves when the server is running.
     */
    whenRunned(): Promise<void> {
        return new Promise((resolve) => {
            const checkRun = () => {
                if (this.runned) {
                    resolve();
                } else {
                    setTimeout(checkRun, 100);
                }
            };
            checkRun();
        });
    }
}

export { Server, HTMLTag, HTMLPage };