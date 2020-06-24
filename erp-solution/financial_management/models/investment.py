# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Investment(models.Model):
    _name = 'financial.investment'
    _description = 'Investment Model'
class InvestmentType(models.Model):
    _name = 'financial.investment.type'
    _description = 'Investment Type Model'

  