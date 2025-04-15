FROM opensearchproject/opensearch:latest

RUN /usr/share/opensearch/bin/opensearch-plugin install --batch \
  analysis-icu \
  analysis-phonetic

RUN /usr/share/opensearch/bin/opensearch-plugin remove opensearch-security
RUN /usr/share/opensearch/bin/opensearch-plugin remove opensearch-performance-analyzer
