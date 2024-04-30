FROM node:lts-alpine
RUN npm install -g http-server
WORKDIR /var/www/html
#COPY package*.json ./
COPY ./app .
RUN npm install
RUN npm run build
EXPOSE 8080
CMD [ "http-server", "dist" ]