FROM postgres:14.5

ARG USER_ID='1000'
ARG USER_ID=${USER_ID}
ENV USER_ID ${USER_ID}

ARG GROUP_ID='1000'
ARG GROUP_ID=${GROUP_ID}
ENV GROUP_ID ${GROUP_ID}

RUN sed -i -e "s/postgres:x:999:999::\/var\/lib\/postgresql:\/bin\/bash/postgres:x:${USER_ID}:${GROUP_ID}::\/var\/lib\/postgresql:\/bin\/bash/g" /etc/passwd
RUN sed -i -e "s/postgres:x:70:/postgres:x:${GROUP_ID}:/g" /etc/group

EXPOSE 5432