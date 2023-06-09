# Use an official PHP runtime as a parent image
FROM php:latest



# Set the working directory to the application code
WORKDIR /var/www/html


# Copy application code to the container
COPY . /var/www/html

# Expose port 80
EXPOSE 8000

# Start the Apache web server
CMD ["php", "-S", 0.0.0.0:8000"]

