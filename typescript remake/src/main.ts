/**
 * Gorciu.NET
 * The Gorciu's social-media platform with superpowers.
 * 
 * @package Gorciu.NET
 * @author  Gorciu
 */

/**
 * Import HTTP server and components from the self-made library
 */
import { HTMLPage, HTMLTag, Server } from "./lib";

/**
 * The object that represents HTTP and WebSocket server
 */
const server = new Server(80);

/**
 * Default page description.
 */
const dfd = 'Gorciu.NET to wspaniałe miejsce, gdzie możesz dzielić się swoimi przemyśleniami z innymi ludźmi oraz komunikować się z innymi. Korzystaj na dowolnym urządzeniu od telefonu do komputera!';

/**
 * The actual Gorciu.NET logic
 */
server.startServer();
server.whenRunned().then(() => {
    server.addRoute('/', () => {
        const tag1: HTMLTag = new HTMLTag('h1');
        tag1.setContent('Witam');
        const tag2: HTMLTag = new HTMLTag('p');
        tag2.setContent('to gorciu.net ale jakieś early stage lmao');
        const page = new HTMLPage('Strona główna', dfd, [tag1, tag2], 'pl');
        return page;
    });
});