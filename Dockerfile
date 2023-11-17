FROM node:20-alpine 
WORKDIR /
COPY . .
RUN yarn install
CMD [ "npm","start" ]
EXPOSE 3000
EXPOSE 10000