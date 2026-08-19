FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y sudo curl wget

RUN useradd -m -s /bin/bash appuser

RUN echo "appuser ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers.d/appuser && \
    chmod 0440 /etc/sudoers.d/appuser

USER appuser

WORKDIR /home/appuser

CMD ["/bin/bash"]
