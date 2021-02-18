#!/usr/bin/python3

from urllib.request import urlopen
from bs4 import BeautifulSoup
import unittest
from urllib.parse import urljoin
from linkextractor import extract_links
import requests

class TestHtml(unittest.TestCase):
   bs = None
   ctr = 1
   @classmethod
   def setUpClass(cls):
      url = "https://www.docker.com/"
      res = requests.get(url)
      TestHtml.bs = BeautifulSoup(urlopen(url), 'html.parser')
      print('\n---------- setupClass -----------')
   @classmethod
   def tearDownClass(cls):
      print('\n---------- tearDown -----------')

   def setUp(self):
      print('.... setUp '+str(TestHtml.ctr)+' ....')
      TestHtml.ctr += 1


   def test_titleText(self):
      pageTitle = TestHtml.bs.find('h1').get_text()
      self.assertEqual('Get Started with Docker', pageTitle);
      print('\t The title test passed')

   def test_contentExists(self):
      content = TestHtml.bs.find('div',{'id':'announcement-bar'})
      self.assertIsNotNone(content)
      print('\t The existing content test passed')

   def test_extract_links(self):
      links = extract_links("https://www.docker.com")
      self.assertIn({'text': 'Why Docker?', 'href': 'https://www.docker.com/why-docker'},links)
      print('\t The extract_links function is working correctly')

if __name__ == '__main__':
   unittest.main()
